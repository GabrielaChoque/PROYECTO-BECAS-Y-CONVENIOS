import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ParteAbajoComponent } from './parte-abajo.component';

describe('ParteAbajoComponent', () => {
  let component: ParteAbajoComponent;
  let fixture: ComponentFixture<ParteAbajoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ParteAbajoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ParteAbajoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
