using NUnit.Framework;
using System;
using System.Collections.Generic;

namespace TicTacToe
{
	[TestFixture()]
	public class TicTacToePlayerTest
	{
		[Test]
		public void Choice()
		{
			Choice cross = TicTacToe.Choice.Instance(TicTacToe.Choice.CROSS);

			Assert.IsTrue(cross.begginer());

			Choice zero = TicTacToe.Choice.Instance(TicTacToe.Choice.ZERO);

			Assert.IsFalse(zero.begginer());

			Assert.AreSame(cross, zero.other());
		}

		[Test, TestCaseSource("DescDataProvider")]
		public void Desc(TicTacToe.Choice[] desc, Choice winner)
		{
			Assert.AreSame(Game.getWinner(desc), winner);
		}

		private IEnumerable<object[]> DescDataProvider()
		{
			Choice c = TicTacToe.Choice.Instance(TicTacToe.Choice.CROSS);
			Choice z = TicTacToe.Choice.Instance(TicTacToe.Choice.ZERO);

			yield return new object[] { 
				new TicTacToe.Choice[] {
					null, null, null,
					null, c, 	null,
					null, null, null,
				},
				null
			};

			yield return new object[] { 
				new TicTacToe.Choice[] {
					c, c, c,
					z, c, z,
					z, z, c,
				},
				c
			};
		}

		[Test]
		public void OnePlayer()
		{
			Player player = new Player(TicTacToe.Choice.Instance(TicTacToe.Choice.CROSS));

			Assert.IsFalse(player.answer().finish);

			Assert.IsNull(player.answer().winner);
		}
	}
}