Feature: app:operations:add command

  Scenario: Add two integers
    When I run the "app:operations:add" command with arguments:
        | numbers | 2 | 3 |
    Then the command output should be "The integer sum of the 2 numbers is 5."
    And the command return code is "0"

  Scenario: Add two floats converted to int before addition
    When I run the "app:operations:add" command with arguments:
      | numbers | 2.1 | 3.9 |
    Then the command output should be "The integer sum of the 2 numbers is 5."
    And the command return code is "0"

  Scenario: Add one integer output error message
    When I run the "app:operations:add" command with arguments:
      | numbers | 2 |
    Then the command output should be "The command need at least two number(s). 1 were passed."
    And the command return code is "1"

  Scenario: Add three integer
    When I run the "app:operations:add" command with arguments:
      | numbers | 2 | 3 | 4 |
    Then the command output should be "The integer sum of the 3 numbers is 9."
    And the command return code is "0"
