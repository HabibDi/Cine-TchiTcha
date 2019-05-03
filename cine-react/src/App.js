import React, { Component } from 'react';
import './App.css';
import $ from 'jquery';

class App extends Component {

  componentWillMount() {
    $.get('http://localhost:8000/api', function (data) {
      console.log(data);
    })
  }
  render() {
    return (
      <div className="App" >

      </div>
    );
  }
}

export default App;
