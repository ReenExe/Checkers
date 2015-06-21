using System;

namespace TicTacToe
{
	public class Desc
	{
		private Choice[] desc = new Choice[9];

		public bool put(byte position, Choice choice)
		{
			if (0 <= position && position <= 8 && desc[position] == null) {
				desc[position] = choice;

				return true;
			}

			return false;
		}
	}
}