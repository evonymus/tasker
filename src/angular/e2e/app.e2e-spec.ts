import { TaskerPage } from './app.po';

describe('tasker App', () => {
  let page: TaskerPage;

  beforeEach(() => {
    page = new TaskerPage();
  });

  it('should display welcome message', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('Welcome to app!');
  });
});
