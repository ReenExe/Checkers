local lapis = require('lapis')
local app = lapis.Application()
app:enable('etlua')

app:get('/', function()
    return { render = 'main' }
end)
app:get('/tic-tac', function()
    return { render = 'tic-tac' }
end)

return app