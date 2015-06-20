using System;

namespace TicTacToe
{
	public class Choice
	{
		public const char CROSS = 'X';
		public const char ZERO = '0';

		private char choice;

		public Choice(char choice)
		{
			this.choice = choice;
		}

		public bool begginer()
		{
			return this.choice == Choice.CROSS;
		}
	}
}