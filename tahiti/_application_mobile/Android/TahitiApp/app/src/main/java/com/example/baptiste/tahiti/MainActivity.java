package com.example.baptiste.tahiti;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class MainActivity extends AppCompatActivity {
    private WebView view;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_main);

        view = findViewById(R.id.webview);

        view.setWebViewClient(new MyBrowser());
        view.getSettings().setLoadsImagesAutomatically(true);
        view.getSettings().setJavaScriptEnabled(true);
        view.setScrollBarStyle(View.SCROLLBARS_INSIDE_OVERLAY);
        view.loadUrl("http://192.168.10.1/tahiti/");
    }

    private class MyBrowser extends WebViewClient {
        @Override
        public boolean shouldOverrideUrlLoading(WebView view, String url) {
            view.loadUrl(url);
            return true;
        }
    }
}

