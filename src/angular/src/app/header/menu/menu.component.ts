import { Component, OnInit, Input, EventEmitter, Output } from '@angular/core';
import {MenuItems} from '../../model/menu/MenuItems';

@Component({
  selector: 'app-menu',
  templateUrl: './menu.component.html'
})
export class MenuComponent implements OnInit {
  @Input() menu: MenuItems;
  @Output() searchClicked = new EventEmitter<MenuItems>();

  constructor() {
  }

  onSearchClick() {
    this.menu.items[0].name="changed";
    this.searchClicked.emit(this.menu);
  }

  ngOnInit() {
  }

}
