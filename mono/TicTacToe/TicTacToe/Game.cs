using System;

namespace TicTacToe
{
	public class Game
	{
		private static byte[][] combinations = new byte[][] {
			new byte[] {0, 1, 2},
			new byte[] {3, 4, 5},
			new byte[] {6, 7, 8},

			new byte[] {0, 3, 6},
			new byte[] {1, 4, 7},
			new byte[] {2, 5, 8},

			new byte[] {0, 4, 8},
			new byte[] {2, 4, 6},
		};

		public static Choice getWinner(TicTacToe.Choice[] desc)
		{
			foreach (byte[] line in combinations) {
				if (desc[line[0]] != null && desc[line[0]] == desc[line[1]] && desc[line[1]] == desc[line[2]]) {
					return desc[line[0]];
				}
			}

			return null;
		}
	}
}