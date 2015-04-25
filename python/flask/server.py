from flask import Flask
app = Flask(__name__)

@app.route('/start')
def start():
    return 'Flask Checkers Player'

if __name__ == '__main__':
    app.run()