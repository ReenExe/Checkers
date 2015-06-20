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
			Choice cross = TicTacToe.Choice.Instance(TicTacToe.Choice.CROSS);

			Assert.IsTrue(cross.begginer());

			Choice zero = TicTacToe.Choice.Instance(TicTacToe.Choice.ZERO);

			Assert.IsFalse(zero.begginer());

			Assert.AreSame(cross, zero.other());
		}

		[Test()]
		public void OnePlayer()
		{
			Player player = new Player(TicTacToe.Choice.Instance(TicTacToe.Choice.CROSS));

			Assert.IsFalse(player.answer().finish);

			Assert.IsNull(player.answer().winner);
		}
	}
}