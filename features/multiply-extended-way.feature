Feature: app:operations:multiply command

  Scenario: Multiply two integers
    When I run the "app:operations:multiply" command with arguments:
        | numbers | 2 | 3 |
    Then the command output should be "The integer multiply of 2 and 3 is 6."
    And the command have in his log "The integer multiply of 2 and 3 is 6." with "INFO"
    And the command return code is "0"

  Scenario: Multiply two floats converted to int before addition
    When I run the "app:operations:multiply" command with arguments:
      | numbers | 2.1 | 3.9 |
    Then the command output should be "The integer multiply of 2.1 and 3.9 is 8.19."
    And the command have in his log "The integer multiply of 2.1 and 3.9 is 8.19." with "INFO"
    And the command return code is "0"

  Scenario: Multiply one integer raises exception
    When I run the "app:operations:multiply" command with arguments:
      | numbers | 2 |
    And the command output should be "1 number(s) were passed to the command. Only several are allowed."
    And the command have in his log "1 number(s) were passed to the command. Only several are allowed." with "WARNING"
    And the command return code is "1"

  Scenario: Multiply three integers
    When I run the "app:operations:multiply" command with arguments:
      | numbers | 2 | 3 | 4 |
    Then the command output should be "The integer multiply of 2 and 3 and 4 is 24."
    And the command have in his log "The integer multiply of 2 and 3 and 4 is 24." with "INFO"
    And the command return code is "0"
