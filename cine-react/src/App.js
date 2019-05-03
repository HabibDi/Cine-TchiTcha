import React, { Component } from 'react';
import logo from './logo.svg';
import './App.css';
import $ from 'jquery';

class App extends Component {

  componentWillMount() {
    $.get('http://localhost:8000/api', function (data) {
      console.log(data);
    })
  }
  render() {

  }
}

export default App;
