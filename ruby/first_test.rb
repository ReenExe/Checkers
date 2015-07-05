gem 'test-unit'
require 'test/unit'
require 'test/unit/ui/console/testrunner'

class FirstTest < Test::Unit::TestCase
  def testTrue()
    assert_equal(true, true)
  end
end