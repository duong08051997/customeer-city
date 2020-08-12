<?php


namespace App\Http\Services;


use App\City;
use App\Http\Repositories\CityRepository;
use GuzzleHttp\Psr7\Request;

class CityService
{
    protected $cityRepo;
    public function __construct(CityRepository $cityRepo)
    {
        $this->cityRepo=$cityRepo;
    }
    public function getAll()
    {
        return $this->cityRepo->getAll();
    }
    public function addCity($request)
    {
        $city = new City();
        $city->name = $request->input('name');
        $this->cityRepo->save($city);
    }
    public function findId($id)
    {
      return  $this->cityRepo->findId($id);

    }
    public function updateCity($request,$id)
    {
        $city = $this->cityRepo->findId($id);
        $city->name =$request->input('name');
        $this->cityRepo->save($city);
    }
    public function deleteCity($id)
    {
        $city = $this->cityRepo->findId($id);
        $city->customers()->delete();
        $city->delete();
    }

}
