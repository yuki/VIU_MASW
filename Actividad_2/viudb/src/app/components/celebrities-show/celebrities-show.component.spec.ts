import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CelebritiesShowComponent } from './celebrities-show.component';

describe('CelebritiesShowComponent', () => {
  let component: CelebritiesShowComponent;
  let fixture: ComponentFixture<CelebritiesShowComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CelebritiesShowComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(CelebritiesShowComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
