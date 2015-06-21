using System;

namespace TicTacToe.Behavior
{
	abstract public class Behavior
	{
		protected Desc desc;

		public Behavior(Desc desc)
		{
			this.desc = desc;
		}

		abstract public Answer getNext();
	}
}