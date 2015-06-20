using System;
using System.Collections.Generic;

namespace TicTacToe
{
	public class Choice
	{
		public const char CROSS = 'X';
		public const char ZERO = '0';

		private static Dictionary<char, Choice> instances = new Dictionary<char, Choice>()
		{
			{ CROSS, new Choice(CROSS)},
			{ ZERO, new Choice(ZERO)},
		};

		private char choice;

		private Choice(char choice)
		{
			this.choice = choice;
		}

		public bool begginer()
		{
			return this.choice == Choice.CROSS;
		}

		public Choice other()
		{
			return instances[this.choice == CROSS ? ZERO : CROSS];
		}

		public static Choice Instance(char choice)
		{
			if (instances.ContainsKey(choice)) {
				return instances[choice];
			}

			throw new Exception();
		}
	}
}