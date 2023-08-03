<?php

namespace App\Providers;

use App\Events\MyEvent;
use Native\Laravel\Facades\ContextMenu;
use Native\Laravel\Facades\Dock;
use Native\Laravel\Facades\MenuBar;
use Native\Laravel\Facades\Window;
use Native\Laravel\Facades\GlobalShortcut;
use Native\Laravel\Menu\Menu;

class NativeAppServiceProvider
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
        MenuBar::create()
            //->route('about')
            ->width(300)
            ->height(300)
            ->showDockIcon();

        Menu::new()
            ->appMenu()
            ->editMenu()
            ->viewMenu()
            ->windowMenu()
            ->submenu('My About', Menu::new()
                ->link('https://beyondco.de', 'Beyond Code')
                ->link('https://simonhamp.me', 'Simon Hamp')
                ->separator()
                ->toggleFullscreen()
                ->separator()
                ->label('My label')
                ->event(MyEvent::class, 'Trigger my event', 'CmdOrCtrl+Shift+D')
            )
            ->register();

        Window::open()
            ->width(400)
            ->height(400)
            ->showDevTools(false)
            ->rememberState();



        /**
            Dock::menu(
                Menu::new()
                    ->event(DockItemClicked::class, 'Settings')
                    ->submenu('Help',
                        Menu::new()
                            ->event(DockItemClicked::class, 'About')
                            ->event(DockItemClicked::class, 'Learn More…')
                    )
            );

            ContextMenu::register(
                Menu::new()
                    ->event(ContextMenuClicked::class, 'Do something')
            );

            GlobalShortcut::new()
                ->key('CmdOrCtrl+Shift+I')
                ->event(ShortcutPressed::class)
                ->register();
        */
    }
}
