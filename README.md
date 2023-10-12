# Student Dashboard

The Student Dashboard project is a web application designed to provide students with a centralized for accessing relevant academic information, resources and tools. It aims to streamline the student experience by offering a user-friendly interface that allows students to easily track their progress, plan activities, access course materials and more.

## Table of contents

- Getting Started
- Installation
- Features
- Usage
- Configuration
- Dependencies
- Contributing

## Installation

To install and run Student Dashboard project using Dokcer Compose, you need to have Docker and Docker Compose installed on your machine. Here are the steps to install and run the project using Docker Compose:

> [!NOTE]
> Make sure you have the project source code and a `docker-compose.yml` file ready for this setup.

1. Clone the Project:
   Clone the Student Dashboard project repository to your local machine if you haven't already:
   `git clone https://github.com/Denys-Nalyvaiko/student-dashboard.git`

2. Navigate to the Porject Directory:
   `cd student-dashboard`

3. Build and Start the Docker Containers:
   Open a terminal in the project directory and run the following command to build and start the Docker containers:
   `docker-compose up`

4. Access the Application:
   After the containers are up and running, you can access the Student Dashboard application in your web browser by navigating to `http://localhost`. The aaplication sholud be available on port 80, which is mapped to the web server's port 8080 inside the container.

5. Shut Down the Containers:
   To stop the container and shut down the application, press `Ctrl + C` in the terminal where Docker Compose is running. Alternatively, you can run the following command in the same directory:
   `docker-compose down`

## Features

- User Authentication: User can create accounts, log in and reset passwords securely.
- Course Overview: User can view a list of their enrolled courses, including course descriptions, instructors and schedules.
- Progress Tracking: The dashboard provides and overview of assignments, quizzes and grades for each course.
- Resource Access: User can access course materials, such as lecture notes, assignments and additional resources.
- To-do List: User can create short tasks with a specific deadline.
- Calendar: The dashboard can sync with user cources and assignments to keep users informed about activities, deadlines, exams and other important dates.

## Contributing

Welcome contributions to improve this student dashboard. If you'd like to contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch for your feature or bug fix.
3. Make your changes and test them thorougly.
4. Submit a pull request, describing your changes and providing a detailed explanation of the problem you're solving.
