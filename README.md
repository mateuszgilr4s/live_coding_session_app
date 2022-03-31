Live coding sample app

to start project:
docker-compose -f docker-compose.yml -f docker-compose.debug.yml -f docker-compose.override.yml up -d

code implements simple functionality of calculating needed time for performing Jobs.

it has service to calculate needed time for job JobTimeCalculator.

There are two types of Jobs, Simple job consists list of tasks from which time is calculating.
Composite jobs it consists multiple simple or more composite jobs. Time is calculated  recursively in that case.
Problem in application is when composite jobs are "looped" as seen in repository:
compositeC is depending on compositeB, b is depending on compositeA and compositeA is depending on compositeC making calculating of c impossible.

Goal of that coding session is to add functionality of detecting circular dependency and handle it differently than letting progam go in to infinite loop.
