from locust import HttpLocust, TaskSet, task

class Behavior(TaskSet):

    @task
    def start(self):
        self.client.get("/")

    @task
    def ticTac(self):
        self.client.get("/tic-tac")

class LocustStressTesting(HttpLocust):
    task_set = Behavior
    min_wait = 1000
    max_wait = 2000

# locust -f LocustStressTesting.py --host=http://127.0.0.1:8080
# http://checkers.lua:8089/