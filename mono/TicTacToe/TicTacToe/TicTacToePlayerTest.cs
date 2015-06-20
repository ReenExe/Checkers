using NUnit.Framework;
using System;

namespace TicTacToe
{
	[TestFixture()]
	public class TicTacToePlayerTest
	{
		[Test()]
		public void First()
		{
			Player player = new Player(new Choice());

			Assert.IsTrue(player.answer());
		}
	}
}