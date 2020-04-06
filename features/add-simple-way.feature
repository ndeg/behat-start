Feature: app:operations:add command

  Scenario: Add two integers
    When I call "app:operations:add" with "2" and "3"
    Then I should see "The integer sum of 2 and 3 is 5."

  Scenario: Add two floats converted to int before addition
    When I call "app:operations:add" with "2.1" and "3.9"
    Then I should see "The integer sum of 2,1 and 3,9 is 5."

  Scenario: Add one integer raises exception
    When I call "app:operations:add" with "2.1"
    Then I should see ""
