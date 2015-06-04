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
      head [1 ..] `shouldBe` (1 :: Int)
