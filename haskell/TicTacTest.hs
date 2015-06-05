-- cabal update && cabal install hspec
-- runhskell tictac.hs
import Test.Hspec
import Test.QuickCheck
import Control.Exception (evaluate)
import TicTac

main :: IO ()
main = hspec $ do
  describe "Some Test" $ do
    it "Some Action" $ do
      TicTac.isExistChoose "X" `shouldBe` (True :: Bool)
      TicTac.isExistChoose "0" `shouldBe` (True :: Bool)
      TicTac.isExistChoose "1" `shouldBe` (False :: Bool)