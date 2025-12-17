<?php

namespace App\Http\Controllers\admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\WebSiteSetting;
use App\Helpers\ToasterNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class SettingsController extends Controller
{
    # WebsiteSetting

    public function WebsiteSetting()
    {
        $webSiteSetting = WebSiteSetting::first();
        return view('backend/setting/website-setting', ['webSiteSetting' => $webSiteSetting]);
    }


    /**
     * Display the settings page
     */
    public function index()
    {
        $settings = WebSiteSetting::all()->pluck('value', 'key')->toArray();

        return view('backend.setting.index', compact('settings'));
    }

    /**
     * Update all settings
     */

    public function UpdateSetting(Request $request)
    {
        $fields = [
            // text fields

            // site info
            'site_name',
            'site_email',
            'site_phone',
            'site_address',
            'site_copyright',
            'site_title',

            // social links
            'site_facebook',
            'site_twitter',
            'site_instagram',
            'site_linkedin',
            'site_youtube',

            // seo
            'site_description',
            'site_keywords',
            'site_author',
            'site_content',

            // color fields
            'site_map',
            'site_color',
            'site_theme',
            'site_language',

            // mail setting
            'mail_driver',
            'mail_host',
            'mail_port',
            'mail_username',
            'mail_password',
            'mail_encryption',
            'mail_from_address',
            'mail_from_name',

            // Page Setting
            'page_title',
        ];


       

        // 🔹 File fields (separate)
        $fileFields = [
            'site_logo'            => 'site_logo.png',
            'site_favicon'         => 'site_favicon.png',
            'admin_logo'           => 'admin_logo.png',
            'admin_favicon'        => 'admin_favicon.png',
            'site_image'           => 'site_image.jpg',
            'page_image'           => 'page_image.jpg',
        ];


        // mail setting

        // $this->setEnvValue($fields);

        

        // =========================
        // 🔹 Handle File Uploads
        // =========================
        foreach ($fileFields as $key => $fileName) {
            $this->uploadImage($request, $key, $fileName);
        }


        // =========================
        // 🔹 Handle Text Inputs
        // =========================
        foreach ($fields as $field) {
            if ($request->has($field)) {
                WebSiteSetting::updateOrCreate(
                    ['key' => $field],
                    ['value' => $request->input($field)]
                );
            }
        }

        Artisan::call('config:clear');
        Artisan::call('cache:clear');

        return back()->with('success', 'Settings updated successfully');
    }


    public function testMail(Request $request)
    {
        $request->validate([
            'test_email' => 'required|email',
            // 'mail_msg' => 'required|string',
        ]);

        try {
            Mail::raw(
                '🎉 Congratulations! Your mail configuration is working successfully.',
                // $request->mail_msg,
                function ($message) use ($request) {
                    $message->to($request->test_email)
                        ->subject('Mail Configuration Test');
                }
            );

            return back()->with('success', 'Test mail sent successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Mail failed: ' . $e->getMessage());
        }
    }

    /**
     * Upload and replace image
     */
    private function uploadImage(Request  $request, $key, $fileName)
    {
        # ============================================ # $request, $key, $fileName

        //$request, $fieldName, $defaultFileName parameter

        //     if ($request->hasFile($fieldName)) {
        //         $file = $request->file($fieldName);
        //         $path = 'uploads/settings/' . $defaultFileName;
        //         // $uploadPath = public_path('uploads/settings/');

        //         // Delete old file if exists
        //         // if (Storage::disk('public')->exists($path)) {
        //         //     Storage::disk('public')->delete($path);
        //         // }

        //         // পুরানো ফাইল থাকলে ডিলিট করো
        //         if (file_exists($path)) {
        //             unlink($path);
        //         }

        //         // নতুন ফাইল move করে upload করো
        //         $file->move($path, $defaultFileName);
        //         // $file->move($uploadPath, $defaultFileName);

        //         // Store new file
        //         // $file->storeAs('uploads/settings', $defaultFileName, 'public');
        //     }
        // }

        # ============================================ #

        // 🔹 File না থাকলে কিছু করবে না (UPDATE safe)
        // if (!$request->hasFile($key)) {
        //     return;
        // }

        // // 🔹 Old image delete
        // $old = WebSiteSetting::where('key', $key)->first();

        // if ($old && $old->value && Storage::disk('public')->exists($old->value)) {
        //     Storage::disk('public')->delete($old->value);
        // }

        // // 🔹 New image upload
        // $file = $request->file($key);

        // $fileName = $defaultName
        //     ? $defaultName
        //     : time() . '_' . $file->getClientOriginalName();

        // $path = $file->storeAs('uploads/settings', $fileName, 'public');

        // // 🔹 Save DB
        // WebSiteSetting::updateOrCreate(
        //     ['key' => $key],
        //     ['value' => $path]
        // );


        # ============================================ #

        // if (!$request->hasFile($key)) {
        //     return;
        // }

        if ($request->hasFile($key)) {

            $file = $request->file($key);

            // Unique file name
          //  $fileName = time() . '_' . $key . '.' . $file->getClientOriginalExtension();

            // Unique file name
            $fileName = time() . '_' . $key . '.' . $file->getClientOriginalExtension();

            // Destination path (public folder)
            $destinationPath = public_path('uploads/settings');

            // Folder না থাকলে create করবে
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // 🔥 Move file
            $file->move($destinationPath, $fileName);

            // DB path (relative)
            $path = 'uploads/settings/' . $fileName;


            // // 🔹 Get old setting
            // $old = WebSiteSetting::where('key', $key)->first();

            // // 🔹 Delete old file
            // if ($old && $old->value && Storage::disk('public')->exists($old->value)) {
            //     Storage::disk('public')->delete($old->value);
            // }

            // // Destination path (public folder)
            // $destinationPath = public_path('uploads/settings');

            // // 🔹 Upload new file
            // // $path = $request->file($key)
            // //     ->storeAs('uploads/settings', $fileName, 'public');

            // // 🔥 Move file
            // $file->move($destinationPath, $fileName);

            // 🔹 Save DB
            WebSiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $path]
            );
        }
    }
    # Reset Setting

    public function ResetSetting(){
        // delete uploaded images
    $paths = [
        //'uploads/site',
       // 'uploads/admin',
        'uploads/settings'
        
    ];

    foreach ($paths as $path) {
        if (File::exists(public_path($path))) {
            File::deleteDirectory(public_path($path));
        }
    }

    // truncate settings table
    WebSiteSetting::truncate();

    return redirect()->back()->with('success', 'Website settings have been reset successfully!');



    // // delete uploads
    // File::deleteDirectory(public_path('uploads'));

    // // clear table
    // WebSiteSetting::truncate();

    // // insert default settings
    // Artisan::call('db:seed', [
    //     '--class' => 'WebSiteSettingSeeder'
    // ]);

    // return response()->json([
    //     'status' => true,
    //     'message' => 'Website settings reset successfully!'
    // ]);

//     যদি folder delete না করে শুধু ভিতরের file delete করতে চাও:

// File::cleanDirectory(public_path($path));


// ✅ Safe Usage (Recommended)
// if (File::exists(public_path($path))) {
//     File::deleteDirectorydeleteDirectory(public_path($path));
// }


    }

}
