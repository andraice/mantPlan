<?php

namespace App\Http\Controllers;


use App\DataTables\ProfileDataTable;
use App\Http\Requests;
use App\Http\Requests\UpdateProfileRequest;
use App\Repositories\ProfileRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class ProfileController extends AppBaseController
{
    /** @var  ProfileRepository */
    private $ProfileRepository;

    public function __construct(ProfileRepository $ProfileRepo)
    {
        $this->ProfileRepository = $ProfileRepo;
    }

    /**
     * Display a listing of the Profile.
     *
     * @param ProfileDataTable $ProfileDataTable
     * @return Response
     */
    public function index()
    {
        $profile = $this->ProfileRepository->find(\Auth::user()->id);

        if (empty($profile)) {
            Flash::error(__('Profile not found'));

            return redirect(route('profile.index'));
        }
        return view('profile.index')->with('profile', $profile);
    }

    /**
     * Update the specified Profile in storage.
     *
     * @param  int              $id
     * @param UpdateProfileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfileRequest $request)
    {
        $profile = $this->ProfileRepository->find($id);

        if (empty($profile)) {
            Flash::error(__('Profile not found'));

            return redirect(route('companies.index'));
        }

        $input = $request->all();
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->storeAs(
                env('PATH_PROFILE_IMAGES', 'uploads'),
                time() . '.' . $request->file('avatar')->extension(),
                'public'
            );

            Image::make(Storage::disk('public')->path($path))->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->crop(300, 300, 0, 0)->save();

            $input['avatar'] = $path;
        }
        $profile = $this->ProfileRepository->update($input, $id);

        Flash::success(__('Profile updated successfully.'));

        return redirect(route('profile.index'));
    }
}
