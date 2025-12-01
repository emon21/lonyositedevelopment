<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use App\Helpers\ToasterNotification;
use App\Models\Feature;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $features = Feature::latest()->get();
        return view('backend/feature/index',['features' => $features]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('backend/feature/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,Feature $feature)
    {
        
        Feature::create([
            'icon' => $request->icon,
            'title' => $request->title,
            'description' => $request->description,

        ]);

        # notification helper function
        $notification = ToasterNotification::Toaster('Feature Create Successfully....','success', 'Create Feature');
        return redirect()->route('admin.feature.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return view('backend/feature/edit',['feature' => $feature]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
        $feature->title = $request->title;
        $feature->description = $request->description;
        $feature->icon = $request->icon;
        $feature->update();

        # notification helper function
        $notification = ToasterNotification::Toaster('Feature Updated Successfully....','info', 'Updated');

        return redirect()->route('admin.feature.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        // Delete data
        $feature->delete();

        # notification helper function
        $notification = ToasterNotification::Toaster('Feature Delete Successfully....','error', 'Deleted');

        return redirect()->route('admin.feature.index')->with($notification);
    }


    // ProductController.php

# Duplicate Data INsert
public function duplicate($id)
{

    $feature = Feature::findOrFail($id);

    // Duplicate the product
    $newfeature = $feature->replicate(); // replicate copies all fillable attributes
    $newfeature->save();

    return response()->json([
        'message' => 'Feature duplicated successfully',
        'Feature' => $newfeature
    ]);
}

# Data Restore

    public function DataRestore()
    {

            // Step 1: সব ডাটা ডিলেট
            Feature::truncate(); // truncate করলে auto-increment reset হয়

            // Step 2: Seeder run
            Artisan::call('db:seed', [
                '--class' => 'FeatureSeeder', // Seeder class এর নাম
                '--force' => true, // force:true লাগে production এ run করার জন্য
            ]);

           // return redirect()->back()->with('success', 'Products restored successfully!');

            # notification helper function
            $notification = ToasterNotification::Toaster('Feature restored successfully!','warning', 'Data Restored');

            return redirect()->route('admin.feature.index')->with($notification);
    }

}
