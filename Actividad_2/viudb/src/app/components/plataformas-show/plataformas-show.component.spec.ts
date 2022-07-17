import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PlataformasShowComponent } from './plataformas-show.component';

describe('PlataformasShowComponent', () => {
  let component: PlataformasShowComponent;
  let fixture: ComponentFixture<PlataformasShowComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ PlataformasShowComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(PlataformasShowComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
