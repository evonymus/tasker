import { Component, OnInit, Input } from '@angular/core';
import {MenuItems} from '../model/menu/MenuItems';
@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.css']
})
export class HeaderComponent implements OnInit {
  menu:MenuItems;
  constructor() {
    this.menu = new MenuItems();
  }

  onSearchClicked(newMenu: MenuItems) {
    this.menu = newMenu;
  }

  ngOnInit() {
  }

}
