Feature: app:operations:multiply command

  Scenario: Add two integers
    When I run the "app:operations:add" command with arguments:
      | numbers | 2 | 3 |
    Then the command output should be "The integer sum of 2, 3 is 5."
    And the command return code is "0"

  Scenario: Add two floats converted to int before addition
    When I run the "app:operations:add" command with arguments:
      | numbers | 2.1 | 3.9 |
    Then the command output should be "The integer sum of 2.1, 3.9 is 5."
    And the command return code is "0"

  Scenario: Add one integer raises exception
    When I run the "app:operations:add" command with arguments:
      | numbers | 2 |
    Then the command output should be "1 number(s) were passed to the command. Only two are allowed."
    And the command return code is "1"

  Scenario: Add two integers
    When I run the "app:operations:add" command with arguments:
      | numbers | 2 | 3 | 4 |
    Then the command output should be "The integer sum of 2, 3, 4 is 9."
    And the command return code is "0"


  Scenario: Add two integers
    When I run the "app:operations:multiply" command with arguments:
      | numbers | 2 | 3 |
    Then the command output should be "The integer sum of 2, 3 is 6."
    And the command return code is "0"

  Scenario: Add two floats converted to int before multiply
    When I run the "app:operations:multiply" command with arguments:
      | numbers | 2.1 | 3.9 |
    Then the command output should be "The integer sum of 2.1, 3.9 is 6."
    And the command return code is "0"

  Scenario: Add one integer raises exception
    When I run the "app:operations:multiply" command with arguments:
      | numbers | 2 |
    Then the command output should be "1 number(s) were passed to the command. Only two are allowed."
    And the command return code is "1"

  Scenario: Add two integers
    When I run the "app:operations:multiply" command with arguments:
      | numbers | 2 | 3 | 4 |
    Then the command output should be "The integer sum of 2, 3, 4 is 24."
    And the command return code is "0"


