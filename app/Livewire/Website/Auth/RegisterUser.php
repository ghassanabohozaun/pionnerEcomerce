<?php

namespace App\Livewire\Website\Auth;

use App\Services\Dashboard\CityService;
use App\Services\Dashboard\CountryService;
use App\Services\Dashboard\GovernorateService;
use App\Services\Dashboard\UserService;
use Illuminate\Support\Facades\Auth;
use Laravel\Prompts\FormBuilder;
use Livewire\Attributes\Rule;
use Livewire\Component;

class RegisterUser extends Component
{
    public $name_ar, $name_en, $email, $password, $mobile, $password_confirm, $terms, $country_id, $governorate_id, $city_id, $remmber;
    public $countries, $governorates, $cities;
    protected UserService $userService;
    protected CountryService $countryService;
    protected GovernorateService $governorateService;
    protected CityService $cityService;

    public function boot(UserService $userService, CountryService $countryService, GovernorateService $governorateService, CityService $cityService)
    {
        $this->userService = $userService;
        $this->countryService = $countryService;
        $this->governorateService = $governorateService;
        $this->cityService = $cityService;
    }

    public function mount()
    {
        $this->countries = $this->countryService->getAllCountriesWithoutRelations();
        $this->countryId ?? ($this->governorates = []);
        $this->governorateId ?? ($this->cities = []);
    }
    protected function rules()
    {
        return [
            'name_ar' => ['required', 'string', 'min:3', 'max:100'],
            'name_en' => ['required', 'string', 'min:3', 'max:100'],
            'email' => ['required', 'email', 'string', 'max:120'], //, Rule::unique('users', 'email')->ignore($this->id)
            'mobile' => ['required', 'min:10'],
            'password' => ['required', 'min:6'],
            'password_confirm' => ['required', 'same:password'],
            'country_id' => ['required', 'exists:countries,id'],
            'governorate_id' => ['required', 'exists:governorates,id'],
            'city_id' => ['required', 'exists:cities,id'],
            // 'terms' => ['required', 'in:on,off'],
        ];
    }

    public function updated()
    {
        $this->validate();
    }

    // register user
    public function registerUser()
    {
        // validate
        $this->validate();

        // data
        $data = [
            'name' => ['ar' => $this->name_ar, 'en' => $this->name_en],
            'email' => $this->email,
            'password' => $this->password,
            'mobile' => $this->mobile,
            'country_id' => $this->country_id,
            'governorate_id' => $this->governorate_id,
            'city_id' => $this->city_id,
        ];

        // store user
        $user = $this->userService->storeUser($data);
        if (!$user) {
            flash()->error(__('general.add_error_message'));
        }

        flash()->success(__('general.add_success_message'));

        Auth::guard('web')->attempt(['email' => $this->email, 'password' => $this->password], true);
        return redirect()->route('website.profile.index');
    }

    //change country
    public function changeCountry($id)
    {
        if ($id != 0) {
            $this->cities = [];
            $this->governorates = [];
            $this->governorate_id = 0;
            $this->governorates = $this->countryService->getAllGovernoratiesByCountry($id);
        } else {
            $this->cities = [];
            $this->governorates = [];
            $this->governorate_id = 0;
        }
    }

    //change governorate
    public function changeGovernorate($id)
    {
        if ($id != 0) {
            $this->cities = [];
            $this->city_id = 0;
            $this->cities = $this->governorateService->getAllCitiesbyGovernorate($id);
        } else {
            $this->city_id = 0;
            $this->cities = [];
        }
    }

    // change city
    public function changeCity($id)
    {
        //
    }

    // render
    public function render()
    {
        return view('livewire.website.auth.register-user');
    }
}
