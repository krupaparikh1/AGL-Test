<?php

class CatInfo
{
    /**
     * @var \People
     */
    protected $people;

    /**
     * CatInfo constructor.
     *
     * @param \People $people
     */
    public function __construct(
        People $people
    ) {
        $this->people = $people;
    }

    /**
     * Get Cat Filter By Owner Gender
     *
     * @return array
     * @throws \Exception
     */
    public function getCatFilterByOwnerGender()
    {
        $peopleData = $this->people->getPeopleData();
        $catInfo = [];

        foreach ($peopleData as $peopleInfo) {
            $gender = $peopleInfo['gender'];
            $petsInfo = $peopleInfo['pets'];
            foreach ((array) $petsInfo as $pet) {
                if ($pet['type'] == "Cat") {
                    $catInfo[] = [
                        'gender' => $gender,
                        'name'   => $pet['name']
                    ];
                }
            }
        }
        return $catInfo;
    }

    /**
     * Get Female Cat Names
     *
     * @return array
     */
    public function getFemaleCatNames()
    {
        $femaleFilter = array_filter(
            $this->getCatFilterByOwnerGender(),
            function ($e) {
                return $e['gender'] === 'Female';
            }
        );
        $femaleCatNames = array_column($femaleFilter, 'name');
        sort($femaleCatNames);
        return $femaleCatNames;
    }

    /**
     * Get Male Cat Names
     *
     * @return array
     */
    public function getMaleCatNames()
    {
        $maleFilter = array_filter(
            $this->getCatFilterByOwnerGender(),
            function ($e) {
                return $e['gender'] === 'Male';
            }
        );
        $maleCatNames = array_column($maleFilter, 'name');
        sort($maleCatNames);

        return $maleCatNames;
    }

    /**
     * Init page
     */
    public function init()
    {
        require "template/template.phtml";
    }
}
