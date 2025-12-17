<?php

namespace App\Http\Controllers\admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\WebSiteSetting;
use App\Helpers\ToasterNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
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
   public function update(Request $request)
   {
      // Validation rules

      // $rules = [
      //     'site_name'         => 'required|string|max:255',
      //     'site_email'        => 'required|email|max:255',
      //     'site_phone'        => 'nullable|string|max:50',
      //     'site_address'      => 'nullable|string|max:500',
      //     'site_copyright'    => 'nullable|string|max:255',
      //     'site_title'        => 'required|string|max:255',
      //     'site_description'  => 'nullable|string',
      //     'site_keywords'     => 'nullable|string',
      //     'site_author'       => 'nullable|string|max:100',
      //     'site_content'      => 'nullable|string',
      //     'site_map'          => 'nullable|url',
      //     'site_color'        => 'nullable|regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
      //     'site_theme'        => 'nullable|in:light,dark',
      //     'site_language'     => 'nullable|string|max:10',

      //     'mail_driver'       => 'nullable|string|max:50',
      //     'mail_host'         => 'nullable|string|max:100',
      //     'mail_port'         => 'nullable|numeric',
      //     'mail_username'     => 'nullable|string|max:100',
      //     'mail_password'     => 'nullable|string',
      //     'mail_encryption'   => 'nullable|string|max:20',
      //     'mail_from_address' => 'nullable|email|max:255',
      //     'mail_from_name'    => 'nullable|string|max:100',
      // ];

      // // Image fields validation
      // $imageRules = [
      //     'site_logo'          => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      //     'site_favicon'       => 'nullable|image|mimes:ico,png,jpg|max:1024',
      //     'admin_logo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      //     'admin_logo_favicon' => 'nullable|image|mimes:ico,png,jpg|max:1024',
      //     'site_image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      // ];

      // // Validate the request
      // $validated = $request->validate([
      //     // Logo & Favicon
      //     'site_logo' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048',
      //     'site_favicon' => 'nullable|image|mimes:ico,png|max:1024',

      //     // Admin Logo
      //     'admin_logo' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
      //     'admin_logo_favicon' => 'nullable|image|mimes:ico,png|max:1024',

      //     // Contact
      //     'site_name' => 'required|string|max:255',
      //     'site_email' => 'required|email',
      //     'site_phone' => 'required|string|max:20',
      //     'site_address' => 'required|string|max:255',
      //     'site_copyright' => 'required|string|max:255',

      //     // Page Title
      //     'site_title' => 'required|string|max:255',
      //     'site_image' => 'nullable|image|mimes:jpg,png|max:2048',

      //     // Social
      //     'site_facebook' => 'nullable|url',
      //     'site_twitter' => 'nullable|url',
      //     'site_instagram' => 'nullable|url',
      //     'site_linkedin' => 'nullable|url',
      //     'site_youtube' => 'nullable|url',

      //     // SEO
      //     'site_description' => 'required|string|max:500',
      //     'site_keywords' => 'required|string|max:255',
      //     'site_author' => 'required|string|max:100',
      //     'site_content' => 'nullable|string',

      //     // Other
      //     'site_map' => 'nullable|url',
      //     'site_color' => 'required|string|max:7', // e.g., #ff5722
      //     'site_theme' => 'required|in:light,dark',
      //     'site_language' => 'required|string|max:5',

      //     // Mail
      //     'mail_driver' => 'required|string|max:50',
      //     'mail_host' => 'required|string|max:100',
      //     'mail_port' => 'required|integer',
      //     'mail_username' => 'nullable|string|max:100',
      //     'mail_password' => 'nullable|string|max:100',
      //     'mail_encryption' => 'nullable|string|max:10',
      //     'mail_from_address' => 'required|email',
      //     'mail_from_name' => 'required|string|max:100',
      // ]);

      // $validator = Validator::make($request->all(), array_merge($rules, $imageRules));

      // if ($validator->fails()) {
      //     return redirect()->back()
      //         ->withErrors($validator)
      //         ->withInput();
      // }


      // Handle file uploads
      // $this->uploadImage($request, 'site_logo', 'site_logo.png');
      // $this->uploadImage($request, 'site_favicon', 'site_favicon.png');
      // $this->uploadImage($request, 'admin_logo', 'admin_logo.png');
      // $this->uploadImage($request, 'admin_logo_favicon', 'admin_logo_favicon.png');
      // $this->uploadImage($request, 'site_image', 'site_image.jpg');

      // // Save text fields
      // $fields = [
      //     'site_name',
      //     'site_email',
      //     'site_phone',
      //     'site_address',
      //     'site_copyright',
      //     'site_title',
      //     'site_facebook',
      //     'site_twitter',
      //     'site_instagram',
      //     'site_linkedin',
      //     'site_youtube',
      //     'site_description',
      //     'site_keywords',
      //     'site_author',
      //     'site_content',
      //     'site_map',
      //     'site_color',
      //     'site_theme',
      //     'site_language',
      //     'mail_driver',
      //     'mail_host',
      //     'mail_port',
      //     'mail_username',
      //     'mail_password',
      //     'mail_encryption',
      //     'mail_from_address',
      //     'mail_from_name',
      //     'site_logo',
      //     'site_favicon',
      //     'admin_logo',
      //     'admin_logo_favicon',
      //     'site_image',
      // ];

      // foreach ($fields as $field) {
      //     WebSiteSetting::updateOrCreate(
      //         ['key' => $field],
      //         ['value' => $request->input($field)]
      //     );
      // if ($request->has($field)) {
      //     WebSiteSetting::updateOrCreate(
      //         ['key' => $field],
      //         ['value' => $request->input($field)]
      //     );
      // }
      // }

      // Generate site_social JSON automatically
      // $socialLinks = [
      //     'facebook'  => $request->input('site_facebook'),
      //     'twitter'   => $request->input('site_twitter'),
      //     'instagram' => $request->input('site_instagram'),
      //     'linkedin'  => $request->input('site_linkedin'),
      //     'youtube'   => $request->input('site_youtube'),
      // ];

      // $socialJson = json_encode(array_filter($socialLinks)); // Remove empty links

      // WebSiteSetting::updateOrCreate(
      //     ['key' => 'site_social'],
      //     ['value' => $socialJson]
      // );

      // foreach ($fields as $field) {

      //     // ✅ File Upload Handle
      //     if ($request->hasFile($field)) {

      //         $file = $request->file($field);
      //         $path = $file->move('settings', 'public');

      //         WebSiteSetting::updateOrCreate(
      //             ['key' => $field],
      //             ['value' => $path]
      //         );
      //     }

      //     // ✅ Normal Text Field
      //     elseif ($request->filled($field)) {

      //         WebSiteSetting::updateOrCreate(
      //             ['key' => $field],
      //             ['value' => $request->input($field)]
      //         );
      //     }
      // }

      $fields = [
         'site_name',
         'site_email',
         'site_phone',
         'site_address',
         'site_copyright',
         'site_title',
         'site_facebook',
         'site_twitter',
         'site_instagram',
         'site_linkedin',
         'site_youtube',
         'site_description',
         'site_keywords',
         'site_author',
         'site_content',
         'site_map',
         'site_color',
         'site_theme',
         'site_language',
         'mail_driver',
         'mail_host',
         'mail_port',
         'mail_username',
         'mail_password',
         'mail_encryption',
         'mail_from_address',
         'mail_from_name',
         'site_logo',
         'site_favicon',
         'admin_logo',
         'admin_favicon',
         'site_image',
      ];


      // Handle file uploads
      $this->uploadImage($request, 'site_logo', 'site_logo.png');
      $this->uploadImage($request, 'site_favicon', 'site_favicon.png');
      $this->uploadImage($request, 'admin_logo', 'admin_logo.png');
      $this->uploadImage($request, 'admin_favicon', 'admin_favicon.png');
      $this->uploadImage($request, 'site_image', 'site_image.jpg');

      foreach ($fields as $field) {

         // 🔹 File upload
         if ($request->hasFile($field)) {

            $old = WebSiteSetting::where('key', $field)->first();

            // old image delete
            // পুরানো ফাইল থাকলে ডিলিট করো
            if (file_exists($path)) {
               unlink($path);
            }

            if ($old && $old->value && Storage::disk('public')->exists($old->value)) {
               Storage::disk('public')->delete($old->value);
            }

            // $path = $request->file($field)->store('settings', 'public');

            // 🔹 New file upload (move)
            $file = $request->file($field);
            $fileName = time() . '_' . $file->getClientOriginalName();

            // uploads/settings/
            $path = $file->storeAs('uploads/settings', $fileName, 'public');

            WebSiteSetting::updateOrCreate(
               ['key' => $field],
               ['value' => $path]
            );
         }

         // 🔹 Text input
         elseif ($request->has($field)) {
            WebSiteSetting::updateOrCreate(
               ['key' => $field],
               ['value' => $request->input($field)]
            );
         }
      }

      // return back()->with('success', 'Settings updated successfully');

      # notification helper function
      $notification = ToasterNotification::Toaster('Website Settings updated successfully', 'success', 'Success');

      return redirect()->route('admin.settings.index')->with($notification);

      // return redirect()->back()->with('success', 'Settings updated successfully!');
   }


   public function UpdateSetting(Request $request)
   {
      $fields = [
         // text fields
         'site_name',
         'site_email',
         'site_phone',
         'site_address',
         'site_copyright',
         'site_title',
         'site_facebook',
         'site_twitter',
         'site_instagram',
         'site_linkedin',
         'site_youtube',
         'site_description',
         'site_keywords',
         'site_author',
         'site_content',
         'site_map',
         'site_color',
         'site_theme',
         'site_language',
         'mail_driver',
         'mail_host',
         'mail_port',
         'mail_username',
         'mail_password',
         'mail_encryption',
         'mail_from_address',
         'mail_from_name',
      ];

      // 🔹 File fields (separate)
      $fileFields = [
         'site_logo'            => 'site_logo.png',
         'site_favicon'         => 'site_favicon.png',
         'admin_logo'           => 'admin_logo.png',
         'admin_favicon'   => 'admin_logo_favicon.png',
         'site_image'           => 'site_image.jpg',
      ];


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

      return back()->with('success', 'Settings updated successfully');
   }

   /**
    * Upload and replace image
    */
   private function uploadImage(Request  $request, $key, $fileName, $defaultName = null)
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
         $fileName = time() . '_' . $key . '.' . $file->getClientOriginalExtension();

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

   public function ResetSetting()
   {
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
