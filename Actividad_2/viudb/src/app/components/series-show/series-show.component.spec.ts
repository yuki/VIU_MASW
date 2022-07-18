import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SeriesShowComponent } from './series-show.component';

describe('SeriesShowComponent', () => {
  let component: SeriesShowComponent;
  let fixture: ComponentFixture<SeriesShowComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SeriesShowComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(SeriesShowComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
