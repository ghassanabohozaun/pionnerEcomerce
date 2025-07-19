<?php

namespace App\Services\Dashboard;

use App\Repositories\Dashboard\CountryRepository;

class CountryService
{
    protected $countryRepository;
    //__construct
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    // get country
    public function getCountry($id)
    {
        $country = $this->countryRepository->getCountry($id);
        if (!$country) {
            return false;
        }
        return $country;
    }

    // get countries
    public function getCountries()
    {
        return $this->countryRepository->getCountries();
    }

    // get all countries without relations
    public function getAllCountriesWithoutRelations()
    {
        return $this->countryRepository->getAllCountriesWithoutRelations();
    }

    // get all governorates by country
    public function getAllGovernoratiesByCountry($id)
    {
        $country = self::getCountry($id);
        $governorates = $this->countryRepository->getAllGovernoratiesByCountry($country);
        return $governorates;
    }

    // store country
    public function storeCountry($request)
    {
        $country = $this->countryRepository->storeCountry($request);
        if (!$country) {
            return false;
        }
        return $country;
    }
    // update country
    public function updateCountry($request, $id)
    {
        $country = self::getCountry($id);
        if (!$country) {
            return false;
        }

        $country = $this->countryRepository->updateCountry($request, $id);
        if (!$country) {
            return false;
        }
        return $country;
    }

    // destory country
    public function destroyCountry($id)
    {
        $country = self::getCountry($id);
        if ($country->governorates->count() > 0 || !$country) {
            return false;
        }

        $country = $this->countryRepository->destroyCountry($country);
        if (!$country) {
            return false;
        }
        return $country;
    }

    // change status
    public function changeStatus($id, $status)
    {
        $country = self::getCountry($id);
        if (!$country) {
            return false;
        }
        $country = $this->countryRepository->changeStatus($country, $status);
        if (!$country) {
            return false;
        }
        return $country;
    }
}
