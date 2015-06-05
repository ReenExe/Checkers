module TicTac (
    isExistChoose, Player (..)
) where

data Player = Player {
    choose :: Char
}

isExistChoose :: [Char] -> Bool
isExistChoose "X" = True
isExistChoose "0" = True
isExistChoose _ = False