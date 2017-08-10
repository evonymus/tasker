import { Component, OnInit } from '@angular/core';
import {MenuItems} from '../../model/menu/MenuItems';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html'
})
export class MenuComponent implements OnInit {
  menu: MenuItems;

  constructor() {
    this.menu = new MenuItems();
  }

  ngOnInit() {
  }

}
