<?php

use Jne\Mappers\LocationMapper;
use Jne\Contracts\Foundation\Location;
use Jne\Contracts\Collections\LocationCollection;

class LocationMapperTest extends PHPUnit_Framework_TestCase {
    protected $rawLocations;

    function setUp()
    {
        $this->rawLocations = [
            'suggestions' => [
                [
                    'value' => 'Bandung',
                    'code'  => 'BDO10000'
                ],
                [
                    'value' => 'BANDUNG KIDUL,BANDUNG',
                    'code'  => 'BDO10045'
                ]
            ]
        ];
    }

    /** @test */
    function location_mapper_can_map_array_of_location()
    {
        $locationMapper = new LocationMapper();

        $locations = $locationMapper->map($this->rawLocations);

        $this->assertCount(2, $locations);

        foreach ($locations as $location) {
            $this->assertInstanceOf(Location::class, $location);
        }
    }
}
