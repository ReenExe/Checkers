require_relative 'answer'
require_relative 'choice'
class Player
  def answer(player = nil)
    return Answer.new Choice::CROSS
  end
end