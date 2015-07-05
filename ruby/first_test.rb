gem 'test-unit'
require 'test/unit'
require 'test/unit/ui/console/testrunner'
require_relative 'player'

class FirstTest < Test::Unit::TestCase
  def testTrue()
    assert_instance_of(Answer, Player.new.answer)
  end
end