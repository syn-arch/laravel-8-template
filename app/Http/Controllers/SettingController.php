<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Repositories\SettingRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\View;

class SettingController extends Controller
{

    /**
     * setting repository var
     *
     * @var SettingRepository
     */
    private $settingRepository;

    /**
     * construct function
     *
     * @return void
     */
    public function __construct()
    {
        $this->settingRepository = new SettingRepository;
    }

    /**
     * showing setting page
     *
     * @return View
     */
    public function index()
    {
        $skins = collect($this->settingRepository->getSkins())->map(function ($item) {
            $item2['name'] = $item;
            return $item2;
        })->pluck('name', 'name')->toArray();
        // return $skins;
        return view('settings.index', [
            'skins' => $skins,
        ]);
    }

    /**
     * update setting data
     *
     * @param SettingRequest $request
     * @return Response
     */
    public function update(SettingRequest $request)
    {
        foreach ($request->all() as $key => $input) {
            $this->settingRepository->updateByKey(['value' => $input], $key);
        }
        return back()->with('success_msg', __('Application Setting') . ' ' . __('success updated'));
    }
}