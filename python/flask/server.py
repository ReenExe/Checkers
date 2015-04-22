from flask import Flask
app = Flask(__name__)

# from `Vagrantfile`
host = "192.168.50.4"

@app.route("/")
def start():
    return "First Checkers Player"

if __name__ == '__main__':
    app.run(host)