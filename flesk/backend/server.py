# Import flask and datetime module for showing date and time
from flask import Flask
import datetime

x = datetime.datetime.now()

# Initializing flask app
app = Flask(__name__)


# Route for seeing a data
@app.route('/member')
def get_time():

	# Returning an api for showing in reactjs
	return {
		"Name": "John Doe",
		"Age": 30,
		"Date": "2023-09-14",
		"programming": "React"
		}


	
# Running app
if __name__ == '__main__':
	app.run(debug=True,port=8080)
