/*
  Hotels Booking Web v1.0.0 (https://github.com/vittorioPiotti/HotelsBooking-Web/releases/tag/1.0.0)
  Copyright 2024 Vittorio Piotti
  Licensed under GPL-3.0 (https://github.com/vittorioPiotti/HotelsBooking-Web/blob/main/LICENSE.md)
*/


'use strict';

class Heading {
  constructor({ date, changeMonth, resetDate }) {
    this.date = date;
    this.changeMonth = changeMonth;
    this.resetDate = resetDate;
    this.element = this.render();
  }

  render() {
    const nav = $('<nav>').addClass('calendar--nav');
    const prevButton = $('<a>').text('\u2039').on('click', () => {
      const currentDate = new Date();
      const currentYear = currentDate.getFullYear();
      const currentMonth = currentDate.getMonth();
      
      const selectedYear = this.date.year();
      const selectedMonth = this.date.month();
      
      // Verifica se l'anno e il mese selezionati sono maggiori dell'anno e del mese attuali prima di cambiare il mese
      if (selectedYear > currentYear || (selectedYear === currentYear && selectedMonth > currentMonth)) {
          this.changeMonth(this.date.month() - 1);
      } 
  });
      const h1 = $('<h1>').text(this.date.format('MMMM YYYY')).on('click', () => this.resetDate());
      const nextButton = $('<a>').text('\u203A').on('click', () => {
        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();
        const currentMonth = currentDate.getMonth();
        
        const selectedYear = this.date.year();
        const selectedMonth = this.date.month();
        
        // Verifica se l'anno e il mese selezionati non superano l'anno e il mese attuali di piÃ¹ di un anno
        if (selectedYear < currentYear || (selectedYear === currentYear && selectedMonth < currentMonth + 11)) {
            this.changeMonth(this.date.month() + 1);
        } 
    });
        
    nav.append(prevButton, h1, nextButton);
    return nav;
  }
}

class Day {
  constructor({ currentDate, date, startDate, endDate, onClick }) {
    this.currentDate = currentDate;
    this.date = date;
    this.startDate = startDate;
    this.endDate = endDate;
    this.onClick = onClick;
    this.element = this.render();
  }

  render() {
    let className = [];
    
    if (moment().isSame(this.date, 'day')) {
      className.push('active');
    }
  
    if (this.date.isSame(this.startDate, 'day')) {
      className.push('start');
    }
  
    if (this.date.isBetween(this.startDate, this.endDate, 'day')) {
      className.push('between');
    }
  
    if (this.date.isSame(this.endDate, 'day')) {
      className.push('end');
    }
  
    if (!this.date.isSame(this.currentDate, 'month')) {
      className.push('muted');
    }
  
    const span = $('<span>').addClass(className.join(' ')).text(this.date.date()).on('click', () => this.onClick(this.date));
    return span;
  }
}

class Days {
  constructor({ date, startDate, endDate, onClick }) {
    this.date = date;
    this.startDate = startDate;
    this.endDate = endDate;
    this.onClick = onClick;
    this.element = this.render();
  }

  render() {
    const thisDate = moment(this.date);
    const daysInMonth = moment(this.date).daysInMonth();
    const firstDayDate = moment(this.date).startOf('month');
    const previousMonth = moment(this.date).subtract(1, 'month');
    const previousMonthDays = previousMonth.daysInMonth();
    const nextsMonth = moment(this.date).add(1, 'month');
    let days = [];
    let labels = [];

    for (let i = 1; i <= 7; i++) {
      labels.push($('<span>').addClass('label').text(moment().day(i).format('ddd')));
    }

    for (let i = firstDayDate.day(); i > 1; i--) {
      previousMonth.date(previousMonthDays - i + 2);
      days.push(new Day({ currentDate: this.date, date: moment(previousMonth), startDate: this.startDate, endDate: this.endDate, onClick: this.onClick }));
    }

    for (let i = 1; i <= daysInMonth; i++) {
      thisDate.date(i);
      days.push(new Day({ currentDate: this.date, date: moment(thisDate), startDate: this.startDate, endDate: this.endDate, onClick: this.onClick }));
    }

    const daysCount = days.length;
    for (let i = 1; i <= 42 - daysCount; i++) {
      nextsMonth.date(i);
      days.push(new Day({ currentDate: this.date, date: moment(nextsMonth), startDate: this.startDate, endDate: this.endDate, onClick: this.onClick }));
    }

    const nav = $('<nav>').addClass('calendar--days');
    nav.append(labels, days.map(day => day.element));
    return nav;
  }
}

class Calendar {
    constructor({ startDate = moment().subtract(5, 'day'), endDate = moment().add(3, 'day'), onChange = () => {} } = {}) {
      this.state = {
        date: moment(endDate),
        startDate: moment(startDate),
        endDate: moment(endDate),
        onChange: onChange
      };
      this.element = this.render();
    }
  
    resetDate() {
      this.setState({
        date: moment()
      });
    }
  
    changeMonth(month) {
      const { date } = this.state;
      date.month(month);
      this.setState({ date });
    }
  
    changeDate(date) {
      let { startDate, endDate } = this.state;
  
      if (startDate === null || date.isBefore(startDate, 'day') || !startDate.isSame(endDate, 'day')) {
        startDate = moment(date);
        endDate = moment(date);
      } else if (date.isSame(startDate, 'day') && date.isSame(endDate, 'day')) {
        startDate = null;
        endDate = null;
      } else if (date.isAfter(startDate, 'day')) {
        endDate = moment(date);
      }
  
      this.setState({ startDate, endDate });
      this.state.onChange({ startDate, endDate });
    }
  
    setState(newState) {
      this.state = { ...this.state, ...newState };
      this.render();
    }
  
    render() {
        
      const { date, startDate, endDate } = this.state;
      const heading = new Heading({ date, changeMonth: month => this.changeMonth(month), resetDate: () => this.resetDate() });
      const days = new Days({ date, startDate, endDate, onClick: date => this.changeDate(date) });
    
      const calendarElement = $('<div>').addClass('calendar').append(heading.element, days.element);
        
      $('#calendar').empty().append(calendarElement);
    }
  }
  
