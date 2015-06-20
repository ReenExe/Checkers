using NUnit.Framework;
using System;

namespace TicTacToe
{
	[TestFixture()]
	public class TicTacToePlayerTest
	{
		[Test()]
		public void Choice()
		{
			Choice cross = new Choice(TicTacToe.Choice.CROSS);

			Assert.IsTrue(cross.begginer());

			Choice zero = new TicTacToe.Choice(TicTacToe.Choice.ZERO);

			Assert.IsFalse (zero.begginer());
		}

		[Test()]
		public void First()
		{
			Player player = new Player(new TicTacToe.Choice(TicTacToe.Choice.CROSS));

			Assert.IsTrue(player.answer());
		}
	}
}