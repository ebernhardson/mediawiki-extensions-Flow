@clean @ee-prototype.wmflabs.org @en.wikipedia.beta.wmflabs.org @firefox @internet_explorer_10 @login @test2.wikipedia.org
Feature: Edit existing title

  Assumes that the test Flow page has at least two topics (with posts).

  Background:
    Given I am logged in
        And I am on Flow page
        And I have created a Flow topic

  Scenario: Edit an existing title
    When I click the Edit title action
      And I edit the title field with Title edited
      And I save the new title
    Then the top post should have a heading which contains "Title edited"

  @phantomjs
  Scenario: Edit existing post
    When I click Edit post
      And I edit the post field with Post edited
      And I save the new post
    Then the saved post should contain Post edited
