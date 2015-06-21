using System;

namespace TicTacToe.Behavior
{
	public class Sequence: TicTacToe.Behavior.Behavior
	{
		public Sequence(Desc desc) : base(desc)
		{

		}

		public override Answer getNext()
		{
			return new Answer();
		}
	}
}