<?php

namespace App\Livewire\General;

use App\Services\Dashboard\CityService;
use App\Services\Dashboard\CountryService;
use App\Services\Dashboard\GovernorateService;
use Livewire\Component;

class AddressDropDown extends Component
{
    public $countryId, $governorateId, $cityId, $countries, $governorates, $cities;
    protected CountryService $countryService;
    protected GovernorateService $governorateService;
    protected CityService $cityService;

    public function boot(CountryService $countryService, GovernorateService $governorateService, CityService $cityService)
    {
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

    public function changeCountry($id)
    {
        if ($id != 0) {
            $this->cities = [];
            $this->governorates = [];
            $this->governorateId = 0;
            $this->governorates = $this->countryService->getAllGovernoratiesByCountry($id);
        } else {
            $this->cities = [];
            $this->governorates = [];
            $this->governorateId = 0;
        }
    }

    public function changeGovernorate($id)
    {
        if ($id != 0) {
            $this->cities = [];
            $this->cityId  = 0;
            $this->cities = $this->governorateService->getAllCitiesbyGovernorate($id);
        } else {
            $this->cityId  = 0;
            $this->cities = [];
        }
    }

    public function render()
    {
        return view('livewire.general.address-drop-down');
    }
}
