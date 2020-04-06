Feature: app:operations:add command

  # PARTIE ADDITION

#  Scenario: Add two integers
#    When I run the "app:operations:add" command with arguments:
#        | numbers | 2 | 3 |
#    Then the command output should be "The integer sum of 2, 3 is 5."
#    And the command return code is "0"
#
#  Scenario: Add two floats converted to int before addition
#    When I run the "app:operations:add" command with arguments:
#      | numbers | 2.1 | 3.9 |
#    Then the command output should be "The integer sum of 2.1, 3.9 is 5."
#    And the command return code is "0"
#
#  Scenario: Add one integer returns 1
#    When I run the "app:operations:add" command with arguments:
#      | numbers | 2 |
#    Then the command output should be "1 number(s) were passed to the command. At least two are allowed."
##    And the command exception message should be "1 number(s) were passed to the command. At least two are allowed."
#    And the command return code is "1"
#
#  Scenario: Add three integers
#    When I run the "app:operations:add" command with arguments:
#      | numbers | 2 | 4 | 6 |
#    Then the command output should be "The integer sum of 2, 4, 6 is 12."
#    And the command return code is "0"

  # PARTIE MULTIPLICATION

  Scenario: Multiply two integers
    When I run the "app:operations:multiply" command with arguments:
        | numbers | 2 | 3 |
    Then the command output should be "The integer product of 2, 3 is 6."
    And the command return code is "0"

  Scenario: Multiply two floats converted to int before multiplication
    When I run the "app:operations:multiply" command with arguments:
      | numbers | 2.1 | 3.9 |
    Then the command output should be "The integer product of 2.1, 3.9 is 6."
    And the command return code is "0"

  Scenario: Multiply one integer returns 1
    When I run the "app:operations:multiply" command with arguments:
      | numbers | 2 |
    Then the command output should be "1 number(s) were passed to the command. At least two are allowed."
#    And the command exception message should be "1 number(s) were passed to the command. At least two are allowed."
    And the command return code is "1"

  Scenario: Multiply three integers
    When I run the "app:operations:multiply" command with arguments:
      | numbers | 2 | 4 | 6 |
    Then the command output should be "The integer product of 2, 4, 6 is 48."
    And the command return code is "0"
