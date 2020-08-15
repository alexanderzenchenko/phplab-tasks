<?php


use PHPUnit\Framework\TestCase;

class WebFunctionsTest extends TestCase
{
    protected const DATA_COUNT = 2;

    protected $airportsSet;

    protected function setUp(): void
    {
        $this->airportsSet = [
            [
                [
                    "name" => "Albuquerque Sunport International Airport",
                    "code" => "ABQ",
                    "city" => "Albuquerque",
                    "state" => "New Mexico",
                    "address" => "2200 Sunport Blvd, Albuquerque, NM 87106, USA",
                    "timezone" => "America/Los_Angeles",
                ],
                [
                    "name" => "Atlanta Hartsfield International Airport",
                    "code" => "ATL",
                    "city" => "Atlanta",
                    "state" => "Georgia",
                    "address" => "6000 N Terminal Pkwy, Atlanta, GA 30320, USA",
                    "timezone" => "America/New_York",
                ],
                [
                    "name" => "Austin Bergstrom International Airport",
                    "code" => "AUS",
                    "city" => "Austin",
                    "state" => "Texas",
                    "address" => "3600 Presidential Blvd, Austin, TX 78719, USA",
                    "timezone" => "America/Los_Angeles",
                ],
                [
                    "name" => "Nashville Metropolitan Airport 1",
                    "code" => "BNA",
                    "city" => "Nashville",
                    "state" => "Tennessee",
                    "address" => "1 Terminal Dr, Nashville, TN 37214, USA",
                    "timezone" => "America/Chicago",
                ],
                [
                    "name" => "Boise Airport",
                    "code" => "BOI",
                    "city" => "Boise",
                    "state" => "Idaho",
                    "address" => "3201 W Airport Way #1000, Boise, ID 83705, USA",
                    "timezone" => "America/Denver",
                ],
            ],

            [
                [
                    "name" => "Charlotte Douglas International Airport",
                    "code" => "CLT",
                    "city" => "Charlotte",
                    "state" => "North Carolina",
                    "address" => "5501 Josh Birmingham Pkwy, Charlotte, NC 28208, USA",
                    "timezone" => "America/New_York",
                ],
                [
                    "name" => "Dallas Love Field",
                    "code" => "DAL",
                    "city" => "Dallas Love Field",
                    "state" => "Texas",
                    "address" => "8008 Herb Kelleher Way, Dallas, TX 75235, USA",
                    "timezone" => "America/Fort_Wayne",
                ],
                [
                    "name" => "Washington Ronald Reagan National Airport",
                    "code" => "DCA",
                    "city" => "Washington - DCA",
                    "state" => "Virginia",
                    "address" => "Arlington, VA 22202, USA",
                    "timezone" => "America/New_York",
                ],
                [
                    "name" => "Denver International",
                    "code" => "DEN",
                    "city" => "Denver",
                    "state" => "Colorado",
                    "address" => "8500 Peña Blvd, Denver, CO 80249, USA",
                    "timezone" => "America/Denver",
                ],
                [
                    "name" => "Dallas Ft Worth International",
                    "code" => "DFW",
                    "city" => "Dallas/Ft Worth",
                    "state" => "Texas",
                    "address" => "2400 Aviation Dr, DFW Airport, TX 75261, USA",
                    "timezone" => "America/Chicago",
                ],
                [
                    "name" => "Detroit Metro Airport",
                    "code" => "DTW",
                    "city" => "Detroit",
                    "state" => "Michigan",
                    "address" => "Detroit, MI 48242, USA",
                    "timezone" => "America/New_York",
                ],
                [
                    "name" => "Newark Liberty International Airport",
                    "code" => "EWR",
                    "city" => "Newark",
                    "state" => "New Jersey",
                    "address" => "3 Brewster Rd, Newark, NJ 07114, USA",
                    "timezone" => "America/New_York",
                ],
                [
                    "name" => "Ft. Lauderdale Hollywood International Airport",
                    "code" => "FLL",
                    "city" => "Ft. Lauderdale",
                    "state" => "Florida",
                    "address" => "100 Terminal Dr, Fort Lauderdale, FL 33315, USA",
                    "timezone" => "America/New_York",
                ],
            ]
        ];
    }

    public function testGetUniqueFirstLetters()
    {
        $this->assertEquals(['A', 'B', 'N'], getUniqueFirstLetters($this->airportsSet[0]));
        $this->assertEquals(['C', 'D', 'F', 'N', 'W'], getUniqueFirstLetters($this->airportsSet[1]));
    }

    public function testFilterByState()
    {
        $airportsFilteredByState = [
            [
                3 => [
                    "name" => "Nashville Metropolitan Airport 1",
                    "code" => "BNA",
                    "city" => "Nashville",
                    "state" => "Tennessee",
                    "address" => "1 Terminal Dr, Nashville, TN 37214, USA",
                    "timezone" => "America/Chicago",
                ]
            ],
            [
                2 => [
                    "name" => "Washington Ronald Reagan National Airport",
                    "code" => "DCA",
                    "city" => "Washington - DCA",
                    "state" => "Virginia",
                    "address" => "Arlington, VA 22202, USA",
                    "timezone" => "America/New_York",
                ]
            ],
        ];
        $this->assertEquals($airportsFilteredByState[0], filterByState($this->airportsSet[0], 'Tennessee'));
        $this->assertEquals($airportsFilteredByState[1], filterByState($this->airportsSet[1], 'Virginia'));
    }

    public function testFilterByFirstLetter()
    {
        $airportsFilteredByFirstLetter = [
            [
                0 => [
                    "name" => "Albuquerque Sunport International Airport",
                    "code" => "ABQ",
                    "city" => "Albuquerque",
                    "state" => "New Mexico",
                    "address" => "2200 Sunport Blvd, Albuquerque, NM 87106, USA",
                    "timezone" => "America/Los_Angeles",
                ],
                1 => [
                    "name" => "Atlanta Hartsfield International Airport",
                    "code" => "ATL",
                    "city" => "Atlanta",
                    "state" => "Georgia",
                    "address" => "6000 N Terminal Pkwy, Atlanta, GA 30320, USA",
                    "timezone" => "America/New_York",
                ],
                2 => [
                    "name" => "Austin Bergstrom International Airport",
                    "code" => "AUS",
                    "city" => "Austin",
                    "state" => "Texas",
                    "address" => "3600 Presidential Blvd, Austin, TX 78719, USA",
                    "timezone" => "America/Los_Angeles",
                ],
            ],
            [
                6 => [
                    "name" => "Newark Liberty International Airport",
                    "code" => "EWR",
                    "city" => "Newark",
                    "state" => "New Jersey",
                    "address" => "3 Brewster Rd, Newark, NJ 07114, USA",
                    "timezone" => "America/New_York",
                ],
            ],
        ];
        $this->assertEquals($airportsFilteredByFirstLetter[0], filterByFirstLetter($this->airportsSet[0], 'A'));
        $this->assertEquals($airportsFilteredByFirstLetter[1], filterByFirstLetter($this->airportsSet[1], 'N'));
    }

    public function testSortAirports()
    {
        $airportsSortedByCity = [
            [
                "name" => "Albuquerque Sunport International Airport",
                "code" => "ABQ",
                "city" => "Albuquerque",
                "state" => "New Mexico",
                "address" => "2200 Sunport Blvd, Albuquerque, NM 87106, USA",
                "timezone" => "America/Los_Angeles",
            ],
            [
                "name" => "Atlanta Hartsfield International Airport",
                "code" => "ATL",
                "city" => "Atlanta",
                "state" => "Georgia",
                "address" => "6000 N Terminal Pkwy, Atlanta, GA 30320, USA",
                "timezone" => "America/New_York",
            ],
            [
                "name" => "Austin Bergstrom International Airport",
                "code" => "AUS",
                "city" => "Austin",
                "state" => "Texas",
                "address" => "3600 Presidential Blvd, Austin, TX 78719, USA",
                "timezone" => "America/Los_Angeles",
            ],
            [
                "name" => "Boise Airport",
                "code" => "BOI",
                "city" => "Boise",
                "state" => "Idaho",
                "address" => "3201 W Airport Way #1000, Boise, ID 83705, USA",
                "timezone" => "America/Denver",
            ],
            [
                "name" => "Nashville Metropolitan Airport 1",
                "code" => "BNA",
                "city" => "Nashville",
                "state" => "Tennessee",
                "address" => "1 Terminal Dr, Nashville, TN 37214, USA",
                "timezone" => "America/Chicago",
            ],
        ];
        $this->assertEquals($airportsSortedByCity, sortAirports($this->airportsSet[0], 'city'));
    }

    public function testPagination()
    {
        $this->assertCount(2, pagination($this->airportsSet[0], 2, 1));

        $expected = [
            [
                "name" => "Austin Bergstrom International Airport",
                "code" => "AUS",
                "city" => "Austin",
                "state" => "Texas",
                "address" => "3600 Presidential Blvd, Austin, TX 78719, USA",
                "timezone" => "America/Los_Angeles",
            ],
            [
                "name" => "Nashville Metropolitan Airport 1",
                "code" => "BNA",
                "city" => "Nashville",
                "state" => "Tennessee",
                "address" => "1 Terminal Dr, Nashville, TN 37214, USA",
                "timezone" => "America/Chicago",
            ],
        ];

        $this->assertEquals($expected, pagination($this->airportsSet[0], 2, 2));

        $expectedLastPage = [
            [
                "name" => "Boise Airport",
                "code" => "BOI",
                "city" => "Boise",
                "state" => "Idaho",
                "address" => "3201 W Airport Way #1000, Boise, ID 83705, USA",
                "timezone" => "America/Denver",
            ],
        ];

        $this->assertCount(1, pagination($this->airportsSet[0], 2, 3));
        $this->assertEquals($expectedLastPage, pagination($this->airportsSet[0], 2, 3));
    }

    public function testGetUri()
    {
        $this->assertEquals('/?filter_by_first_letter=A&page=1', getUri(['filter_by_first_letter' => 'A', 'page' => 1]));
        $this->assertEquals('/?filter_by_state=Idaho&page=5', getUri(['filter_by_state' => 'Idaho', 'page' => 5]));
        $this->assertEmpty(getUri([]));
    }
}
